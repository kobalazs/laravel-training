docker build . --tag=laravel-training
docker run -v "/Users/kovacsb/Development/laravel-training/src:/srv/app" -d -p 8080:80 --name laravel-training laravel-training
