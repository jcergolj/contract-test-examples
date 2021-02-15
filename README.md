# Two examples of contract tests

### Installation
```
git clone https://github.com/jcergolj/contract-test-examples.git
composer install
```

### Insert your stripe key
tests/withTrait/StripePaymentGatewayTest.php line 17 <br/>
tests/withDataProviders/PaymentGatewayContractTest.php line 43

### Contract test with trait
```
cd tests/withTrait
```

### Contract test with dataProviders
```
cd tests/withDataProviders
```

### Tests
Run in command line
```
phpunit tests/withTrait
phpunit tests/withDataProviders
```
