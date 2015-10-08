require_relative '../../lib/media/parsers/libsyn_parser'
require_relative 'rss_feed_ref'
require 'rspec'

RSpec.describe Nads::Media::Parsers::LibsynParser do
  it 'can parse sample feed' do
    provider = double('Fake Provider', :get_feed => RSSFeedRef.simple_xml)

    parser = described_class.new(provider)

    parsed = parser.get_latest

    # The Collection
    expect(parsed).to_not be_nil
    expect(parsed.empty?).to eq(false)
    expect(parsed.count).to eq(1)

    parsed.each do |podcast|
      # The Object
      expect(podcast).to_not be_nil
      expect(podcast).to be_a_kind_of(Nads::Media::Entities::Media)
      expect(podcast).to be_a(Nads::Media::Entities::Podcast)

      # The Id
      expect(podcast.id).to_not be_nil
      expect(podcast.id.empty?).to eq(false)
      expect(podcast.id).to be_a(String)
      expect(podcast.id).to match(/^[a-zA-Z0-9]*$/)

      # The title
      expect(podcast.title).to_not be_nil
      expect(podcast.title.empty?).to eq(false)
      expect(podcast.title).to be_a(String)

      # Date Created
      expect(podcast.date_created).to_not be_nil
      expect(podcast.date_created).to be_a(String)

      # Description
      expect(podcast.description).to_not be_nil
      expect(podcast.description.empty?).to eq(false)
      expect(podcast.description).to be_a(String)

      # Url
      expect(podcast.url).to_not be_nil
      expect(podcast.url.empty?).to eq(false)
      expect(podcast.url).to be_a(String)

      # Tags
      expect(podcast.tags).to_not be_nil
      expect(podcast.tags.empty?).to eq(false)
      expect(podcast.tags).to be_a(Array)
      podcast.tags.all? { |tag| expect(tag).to be_a(String) }

      # Duration
      expect(podcast.duration).to_not be_nil
      expect(podcast.duration.empty?).to eq(false)
      expect(podcast.duration).to be_a(String)

      # Number
      expect(podcast.number).to_not be_nil
      expect(podcast.number.empty?).to eq(false)
      expect(podcast.number).to be_a(String)
    end
  end

  it 'raises when no guid node is present' do
    provider = double('Fake Provider', :get_feed => RSSFeedRef.missing_guid_xml)

    parser = described_class.new(provider)

    expect {

      parser.get_latest

    }.to raise_error('Unable to parse feed. Missing or empty guid node.')
  end

  it 'raises when no link node is present' do
    provider = double('Fake Provider', :get_feed => RSSFeedRef.missing_url_xml)

    parser = described_class.new(provider)

    expect {

      parser.get_latest

    }.to raise_error('Unable to parse feed. Missing or empty link node.')

  end

  it 'returns requested amount' do
    provider = double('Fake Provider', :get_feed => RSSFeedRef.full_xml)

    parser = described_class.new(provider)

    parsed = parser.get_latest

    expect(parsed.count).to eq(10)

    parsed = parser.get_latest(10)

    expect(parsed.count).to eq(10)

    parsed = parser.get_latest(2)

    expect(parsed.count).to eq(2)

    parsed = parser.get_latest(23)

    expect(parsed.count).to eq(23)

  end
end
