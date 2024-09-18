index=23;
for f in *; do
    if [ -d "$f" ] && [ $f != "archive" ]; then
        rm -Rf $f;
        for g in *; do
            if [ -d "$g" ] && [ $g != "archive" ]; then
                rm -Rf $g;
                php populate.php;
                cp history.php historyhv$index.php;
                git checkout $g;
                git checkout history.php;
                index=$((index+1));
            fi
        done
        git checkout $f/;
    fi
done