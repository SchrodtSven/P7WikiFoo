tree -I "archive|dump|cache|phpunit|tree.txt"  >> README.md
cloc . >> README.md; phpunit >> README.md
git add .
git commit -m "Changing gitish's behaviour; minor changes"
git push origin
