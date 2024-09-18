for f in 2024*; do
    if [ -d "$f" ] && [ $f != "archive" ]; then
        rm -Rf $f;
        php populate.php;
        git checkout $f/;
        php bets.php $f;
        git checkout history.php;
    fi
done