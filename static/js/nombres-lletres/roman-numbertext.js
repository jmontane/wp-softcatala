var rules_roman=`
# Roman numbers
1:(.)(.)(.) \\1
2:(.)(.)(.) \\1\\1
3:(.)(.)(.) \\1\\1\\1
4:(.)(.)(.) \\1\\2
5:(.)(.)(.) \\2
6:(.)(.)(.) \\2\\1
7:(.)(.)(.) \\2\\1\\1
8:(.)(.)(.) \\2\\1\\1\\1
9:(.)(.)(.) \\1\\3

(\\d) $(\\1:IVX)
(\\d)(\\d) $(\\1:XLC)$2
(\\d)(\\d\\d) $(\\1:CDM)$2

([123])(\\d\\d\\d) $(\\1:Mxx)$2	# [:Roman-large:]
(\\d+)(\\d\\d\\d) \\($1\\)$2		# [:Roman-large:]

([123])(\\d\\d\\d) $(\\1:M--)$2
([123]\\d{3})(\\d\\d\\d) $(overline $1)$2		# overline: ×1000
(\\d{1,3})(\\d\\d\\d) $(overline $1)$2		# overline: ×1000
([123]\\d{3})(\\d{5}) \\|$(overline $1)\\|$2	# bar: ×100
(\\d{1,3})(\\d{5}) \\|$(overline $1)\\|$2
(\\d+) \\1

== overline ==

(.*)(.) $(overline \\1)\\2̅	# recursive overline

== historical ==

(\\d)(\\d\\d\\d) $(\\1:ↀↁↂ)$2
([123])(\\d\\d\\d\\d) $(\\1:ↂ--)$(historical \\2)
(.*) $1

== help ==

help Modules\\nRoman-large (language code): multiple parenthesized form\\nRoman: overline (×1000) with bar (×100)\\nFunctions: historical – with special Unicode characters for 1000, 5000 and 10000
`

