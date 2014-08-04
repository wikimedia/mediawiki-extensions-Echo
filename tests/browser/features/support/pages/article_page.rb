class ArticlePage
  include PageObject
  include URL
  page_url URL.url("<%=params[:article_name]%><%=params[:hash]%>")
  li("flyout_link_container", css: "#pt-notifications")
  a("flyout_link", css: "#pt-notifications a")
  div("flyout", css: ".mw-echo-overlay")
end
