# Data manager for Echo tests
class DataManager
  def initialize
    @data = {}
  end

  def get(part)
    @data[part] = "#{part}_#{Random.srand}" unless @data.key? part
    @data[part]
  end
end
