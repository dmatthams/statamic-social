# Statamic social

A super simple social plugin for adding social icons to any Statamic page. Currently only supports the smaller versions with and without counters.

## Usage

Put it in your _add-ons folder and use with:

	{{ social }}

By default it will show all available social buttons but you can filter it down by facebook, twitter, pinterest, linkedin or google:

	{{ social show=“facebook|twitter” }}

Counters show as default but you can turn them off with:

	{{ social show=“facebook|twitter” counter=“false” }}

## Todo

* Add option to change button size

Find me on twitter [@dmatthams](http://twitter.com/dmatthams)
