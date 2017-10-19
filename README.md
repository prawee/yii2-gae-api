# yii2-gae-api
Create RESTful for deploy on Google App Engine with Yii2

### Installalion
```bash
$ git clone https://github.com/prawee/yii2-gae-api
$ cd yii2-gae-api
$ composer install
```

### Running
localhost
```bash
$ php -S localhost:8080 -t web
```

localhost with google app engine
```bash
$ dev_appserver.py app.yaml
```