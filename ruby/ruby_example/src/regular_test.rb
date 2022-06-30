# メアドチェック
# run code: $ ruby regular_test.rb test@example.com

#require 'stackprof'
#require 'debug'
require 'benchmark'
include Benchmark

def basic_regexp(word, regexp)
  puts regexp =~ word ? 'ok' : 'ng'
end

def regexp_class(word, regexp)
  puts Regexp.compile(regexp).match(word) ? 'ok' : 'ng'
end

def string_match(word, regexp)
  puts word.match(regexp) ? 'ok' : 'ng'
end

line = ARGV[0]
#profile = StackProf.run(interval: 1) {
Benchmark.benchmark(CAPTION, 7, FORMAT) do |x|
  x.report("Regexp.=~:"){ /\A[\w+\-.]+@[a-z\d\-.]+\.[a-z]+\z/ =~ line }
  x.report("Regexp.match:"){ /\A[\w+\-.]+@[a-z\d\-.]+\.[a-z]+\z/.match(line) }
  x.report("String.=~:"){ line =~ /\A[\w+\-.]+@[a-z\d\-.]+\.[a-z]+\z/ }
  x.report("String.match:"){ line.match(/\A[\w+\-.]+@[a-z\d\-.]+\.[a-z]+\z/) }
end
#}

#puts(StackProf::Report.new(profile).print_text)
