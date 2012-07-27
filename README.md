# Syte as a Yii Framework Module

This is a Yii Framework module based on [Syte](https://github.com/rigoneri/syte/)

# How to use:

1. Download the package [here](https://github.com/TXGruppi/syte-yii/zipball/master)
2. Unpack it and copy the syte folder to `your_web_app/protected/modules/`
3. Add the `syte` module to `modules` array in the `your_web_app/protected/config/main.php`
4. Add to `components` array:

```php
array(
 'components' => array(
   'syte' => array(
     'class' => 'syte.components.SyteApplicationComponents',
   ),
 ),
);
```

5. Open `http://localhost/your_web_app/?r=syte` and follow the installation instructions