require 'benchmark'
include Benchmark

a = [1, 2, 3, 4, 5]
b = [a] * 20

Benchmark.benchmark(CAPTION, 7, FORMAT) do |x|
  x.report("flatten.map:"){ b.flatten.map { |i| i * 2 } }
  x.report("map.flatten:"){ b.map { |i| i * 2 }.flatten }
  x.report("flat_map:"){ b.flat_map { |i| i * 2 } }
end
