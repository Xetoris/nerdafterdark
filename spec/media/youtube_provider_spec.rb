require_relative '../spec_helper'
require_relative '../../lib/media/providers/youtube_provider'

describe 'youtube_provider' do
  it 'can parse basic feed' do
    provider = Nads::Media::Providers::YoutubeProvider.new(ENV['Youtube_Api_Key'],ENV['Youtube_Channel_Id'])
    provider.get_latest(10)
  end

  it 'returns requested amount' do

  end
end