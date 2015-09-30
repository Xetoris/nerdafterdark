require_relative '../../features_helper'

describe 'Visit home' do
  it 'is successful' do
    visit '/'

    page.body.must_include('Nerd After Dark')
  end
end