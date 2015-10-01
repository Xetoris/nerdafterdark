require 'Nokogiri'
require_relative '../entities/podcast'

module Nads
  module Media
    module Providers
      class LibsynProvider
        def initialize(&source)
          @source = source
        end

        # @params[Integer] count
        # @returns[Array]
        def get_latest(count=10)
          ngk_xml = get_nokogiri_instance(@source.call)

          casts = ngk_xml.css('item')

          results = []
          casts.each do |cast|
            results.push(construct_podcast(cast))
          end

          results.take(count)
        end

        private

        #####################
        ## Private Methods ##
        #####################

        # @params[Nokogiri::XML] noko_object
        # @returns[Nads::Media::Podcast]
        def construct_podcast(noko_object)
          id_node = noko_object.css('guid').first
          title_node = noko_object.css('title').first
          date_node = noko_object.css('pubDate').first
          description_node = noko_object.css('description').first
          url_node = noko_object.css('link').first
          tags_node = noko_object.css('itunes|keywords').first
          duration_node = noko_object.css('itunes|duration').first

          if id_node.nil? || id_node.content.empty?
            raise('Unable to parse feed. Missing or empty guid node.')
          end

          if url_node.nil? || url_node.content.empty?
            raise('Unable to parse feed. Missing or empty link node.')
          end

          if description_node.nil? || description_node.content.empty?
            description = ''
          else
            description_cdata = description_node.children.first.content

            if description_cdata.include?('<p>')
              description = description_cdata.split('</p>').first.split('<p>').last
            else
              description = description_cdata
            end
          end

          if title_node.nil? || title_node.content.empty?
            title = 'A Nads Podcast!'
            title_missing = true
          else
            title = title_node.content
            title_missing = false
          end

          media = Nads::Media::Entities::Podcast.new

          media.id = id_node.children.first.content
          media.title = title
          media.date_created = date_node.nil? || date_node.content.empty? ? nil : date_node.content
          media.description = description
          media.url = url_node.children.first.content
          media.tags = tags_node.nil? || tags_node.content.empty? ? nil : tags_node.content.split(',')
          media.duration = duration_node.nil? || duration_node.content.empty? ? nil : duration_node.content
          media.number = title_missing ? nil : title.split(' ').last

          media
        end

        # @params[String] xml
        # @returns[Nokogiri::XML]
        def parse_xml(xml)
          Nokogiri::XML(xml) do |config|
            config.options = Nokogiri::XML::ParseOptions::NONET
          end
        end

        # @params[Object] input
        # @returns[Nokogiri::XML]
        def get_nokogiri_instance(input)
          if input.is_a?(String)
            result = parse_xml(input)
          elsif input.is_a?(Nokogiri::XML)
            result = input
          else
            raise('Non-supported type provided as input.')
          end

          result
        end
      end
    end
  end
end