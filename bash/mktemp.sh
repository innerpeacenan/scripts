#!/usr/bin/env bash
tmpfile=$(mktemp) || { echo "$0 creating tempfile failed!"; exit 1; }
rm --force $tmpfile