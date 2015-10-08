require 'Nokogiri'
require 'google/apis/youtube_v3'
require_relative '../../media/entities/youtube'

module Nads
  module Media
    module Providers
      class YoutubeProvider
        def initialize(developer_key, channel_id)
          @key = developer_key
          @channel = channel_id
          @service_name = 'youtube'
          @api_version = 'v3'
        end

        # @params[Integer] count
        # @returns[Array]
        def get_latest(count=10)
          youtube = Google::Apis::YoutubeV3

          client = youtube::YouTubeService.new

          client.key = @key

          resp = client.list_searches('id,snippet', channel_id: @channel, type: 'video', max_results: count, order: :date)

          entities = []

          resp.items.each do |item|
            entity = Nads::Media::Entities::YouTube.new

            entity.id = item.id.video_id
            entity.date_created = item.snippet.published_at
            entity.title = item.snippet.title
            entity.description = item.snippet.description
            entity.url = "https://www.youtube.com/watch?v=#{entity.id}"
            entity.thumbnail = item.snippet.thumbnails.high.url

            entities.push(entity)
          end

          resp
        end
      end
    end
  end
end