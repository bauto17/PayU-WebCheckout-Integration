# Sample PHP PayU WebCheckout Integration

Este proyecto es una integración simple de la plataforma de pagos WebCheckout a una aplicación PHP
IMPORTANTE este no es una guía oficial de PayU

## Getting Started


### Prerequisites

* PHP 7.0
* MySql

### Installing

Se debe crear el archivo Conf.php donde se guardan los datos del negocio con el sigiente formato

```
$API_KEY= /* your ApiKey */;
$MERCHANTID = /* your merchantId */;
$ACCOUNTID =  /* your accountId */;
$RESPONSEUrl= "/* www.example.com/response.php */";
$CONFIRMATIONUrl = "/* www.example.com/confirm.php */";
```

## Running the tests

la configuracion de un entorno de pruebas se encuentra en [este link](http://developers.payulatam.com/es/web_checkout/sandbox.html)

### sandbox tests

Se puede hacer uso del modo de pruebas al enviar en el formulario el campo de text con valor 1

```
<input name="test" type="hidden" value="1">
```

### Users Test

para probar el sistema se deben crear targetas con los nombres APPROVED(aprobada), REJECTED(rechazada) o PENDING(pendiente), y se deb ingresar un numero de trajeta valido y que corresponda a la franquicia seleccionada(Visa, masterdCard, Etc).


## Built With

* [Dropwizard](http://www.dropwizard.io/1.0.2/docs/) - The web framework used
* [Maven](https://maven.apache.org/) - Dependency Management
* [ROME](https://rometools.github.io/rome/) - Used to generate RSS Feeds

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags).

## Authors

* **Sebastián Bautista** - *Initial work* - [Bauto17](https://github.com/bauto17)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone who's code was used
* Inspiration
* etc
