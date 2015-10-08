require 'RestClient'

module Nads
  module Media
    module Providers
      class RSSProvider
        def initialize(url)
          @feed = url
        end

        def get_feed(parameters)
          RestClient::Request.execute(method: :get, url: @feed, parameters: parameters)
        end
      end
    end
  end
end