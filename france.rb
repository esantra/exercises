require 'active_record'
class Country < ActiveRecord::Base
  has_many :cities
end

class City < ActiveRecord::Base
  belongs_to :country
  has_many :bars
end

class Bar < ActiveRecord::Base
  belongs_to :city
end

#ruby code
	@country = Country.find_by_name("France")
        @france  = Country.where(name: 'France').includes(:cities).first
        @cities = @france.cities
	#3. How would you assign to @bars an Array of all the bars in France?
	@country = Country.find_by_name("France")
	@cities = @country.cities
	@bars = []
	@cities.each do |city|
   	   @bars << city.bars
 	end

	#4. How would you assign to @directory an Array of the names of all the bars in France, sorted?
	@directory = @bars.map{|b| b.name}.sort 
