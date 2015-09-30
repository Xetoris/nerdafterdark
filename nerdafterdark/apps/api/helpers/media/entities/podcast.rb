require_relative 'media'

module Nads
  module Media
    module Entities
      class Podcast < Media
        attr_accessor :tags, :duration, :number
      end
    end
  end
end
