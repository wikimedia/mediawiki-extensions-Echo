module PageObject
  def refresh_until(timeout = PageObject.default_page_wait, message = nil)
    platform.wait_until(timeout, message) do
      yield.tap do |result|
        refresh unless result
      end
    end
  end
end
