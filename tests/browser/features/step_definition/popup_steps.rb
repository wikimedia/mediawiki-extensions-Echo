Given(/^I see the alert popup$/) do
  on(ArticlePage) do |page|
    expect(page.alerts.title_element.when_present.text).to match('Alerts')
  end
end

Given(/^I see the message popup$/) do
  on(ArticlePage) do |page|
    expect(page.messages.title_element.when_present.text).to match('Messages')
  end
end
