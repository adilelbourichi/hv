for index in {1..449}
do
    for f in *; do
        if [ -d "$f" ] && [ $f != "archive" ]; then
            rm -Rf $f;
            php populate.php;
            git checkout $f/;
            php bets.php $f;
            git checkout history.php;
        fi
    done
done