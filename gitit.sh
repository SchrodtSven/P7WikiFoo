

tree -I "archive|dump|cache|phpunit|tree.txt"  >> README.md
cloc . >> README.md; 

phpunit >> README.md



echo "</code>" >> README.md
echo "</pre>" >> README.md
# Adding, committing & pushing with message from STDIN <- @FIXME!!!!
# git add .
# git commit -m "Changing gitish's behaviour; minor changes"
# git push origin
