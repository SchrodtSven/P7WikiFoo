if [ $# -eq 0 ]
  then
    echo "Please add a commit message as agument (\$1) !"
    exit 23
fi
# Project file structure (filtered)
tree -I "archive|dump|cache|phpunit|tree.txt"  >> README.md
# Counting lines of code (filtered by .cloc contents)
cloc . >> README.md; 
# Processing uit tests
phpunit >> README.md
# Sanitizing markup in README.md
echo "</code>" >> README.md
echo "</pre>" >> README.md
# Adding, committing & pushing with message from STDIN
git add .
git commit -m $1
git push origin
