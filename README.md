# Syte as a Yii Framework Module

This is a Yii Framework module based on [Syte](https://github.com/rigoneri/syte/)

# How to use:

- Download the package [here](https://github.com/TXGruppi/syte-yii/zipball/master)
- Unpack it and copy the syte folder to `your_web_app/protected/modules/`
- Add the `syte` module to `modules` array in the `your_web_app/protected/config/main.php`
- Add to `components` array:

```php
array(
 'components' => array(
   'syte' => array(
     'class' => 'syte.components.SyteApplicationComponents',
   ),
 ),
);
```

- Open `http://localhost/your_web_app/?r=syte` and follow the installation instructions