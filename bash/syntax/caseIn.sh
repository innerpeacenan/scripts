#!/bin/bash
case $1 in
"hello")
echo "Hello, how are you?"
;;

"")
    echo "You must input parameters,eg:> $0 someword"
;;

*)
    echo "Usage $0 {hello}"
;;

esac    # --- end of case ---

