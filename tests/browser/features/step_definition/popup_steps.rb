Given(/^I see the alert popup$/) do
  on(ArticlePage) do |page|
    expect(page.popup_title(page.popup_alert_element).text).to match('Alerts')
  end
end

Given(/^I see the message popup$/) do
  on(ArticlePage) do |page|
    expect(page.popup_title(page.popup_message_element).text).to match('Messages')
  end
end
