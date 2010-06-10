#!/usr/bin/env python

#	/* Python API-Adaptor for Knoxious Open Pastebin.
#	 * ===================================================================================
#	 * "THE BEER-&-COFFEE-WARE LICENSE" [ Revision 0 ]:
#	 * - Variation of the "BEER-WARE LICENSE" Rev 42.
#	 * <xan.manning@gmail.com> wrote this file. As long as you retain this notice you
#	 * can do whatever you want with this stuff. If we meet some day, and you think
#	 * this stuff is worth it, you can buy me a beer or coffee in return. Xan Manning
#	 * ===================================================================================
#	 */
#
#	Uses the API for Knoxious Open Pastebin to paste terminal output.
#


# Start DEFAULTS


# API to POST to.
api = "http://pzt.me/api"

# Your name / pseudonym
author = "Anonymous"

# Make the post private? (1 for yes, 0 for no)
privacy = 0

# Done ...









import optparse
import urllib
import sys

req_version = (2, 5)
desire_version = (2, 6)
cur_version = sys.version_info[:2]

if (cur_version[0] > req_version[0] or (cur_version[0] == req_version[0] and cur_version[1] >= req_version[1])):
	try:
		import json
	except ImportError:
		import simplejson as json

	funcName = "json.loads"

	if (cur_version[0] > desire_version[0] or (cur_version[0] == desire_version[0] and cur_version[1] >= desire_version[1])):
		isRead = 0
	else:
		try:
			func = locals()[ funcName ]
			if callable( func ):
				func( "{'str': 'hello world'}" )
				isRead = 0
		except:
			print funcName, "is not defined..."
			isRead = 1

	print ""
	print "Please enter your text here, press 'CTRL+D' when you are finished!"
	print ""

	pipe = sys.stdin.read()
	pipe = str(pipe)

	def main():
		p = optparse.OptionParser()
		p.add_option('--api', '-a', default=api)
		p.add_option('--privacy', '-p', default=privacy)
		p.add_option('--author', '-u', default=author)
		p.add_option('--text', '-t', default=pipe)
		p.add_option('--syntax', '-s', default="plaintext")
		p.add_option('--raw', '-r', default=0)
		p.add_option('--expire', '-e', default=0)
		options, arguments = p.parse_args()
		print ""
		print ""
		print "End of capture..."
		print 'Posting to', api, 'as %s' % options.author

		params = urllib.urlencode({'pasteEnter': options.text, 'privacy': options.privacy, 'author': options.author, 'highlighter': options.syntax, 'lifespan': options.expire})
		f = urllib.urlopen(api, params)

		returnRead = f.read()
		returnStr = str(returnRead)

		if isRead > 0:
			returnJSON = json.read(returnStr)
		else:
			returnJSON = json.loads(returnStr)

		if options.raw > 0:
			rawOutput = "@raw"
		else:
			rawOutput = ""

		print ""
		print "==============================================================================="
		print ""

		if returnJSON['error'] != 0:
			print "There was an error: \"", returnJSON['message'], "\""
		else:
			print "URL to your paste is: '", returnJSON['url'] + rawOutput, "'"

		print ""
		print "Have a nice day..."
		print ""
		print "==============================================================================="
		print ""


	if __name__ == '__main__':
		main()
else:
	print "Your Python Interpreter is too old, I recommend you upgrade!"
