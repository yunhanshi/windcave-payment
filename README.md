# Windcave Payment PHP SDK
## Overview
This plugin is for fast development of Payment Express (Windcave) Pxpay 2 and EFTPOS HIT (host Initiated Transactions) service.
To use this plugin, you should apply for related accounts from [Windcave](https://www.windcave.com/).

## Requirements
- PHP 7.0+.
- cURL extension.
- Windcave account.

## Install
### Composer
run the following command in your project's root directory
```bash
composer require yunhanshi/windcave-payment
```

### Manual
Download the SDK source code, and introduce the `autoload.php` file under the SDK directory to your code:
```bash
require_once '/path/to/windcave-payment/autoload.php';
```

## Pxpay 2
PxPay 2.0 is a platform independent ecommerce solution provided by Windcave. Using a Hosted Payment Page to accept sensitive card data, PxPay2.0 provides a financially secure and compliant solution without exposing merchants to sensitive information. Instead of hosting a payment page on their own website, PxPay 2.0 allows merchants to redirect their customer to a payment page hosted by Windcave; this will normally reduce the scope of Payment Card Industry compliance.

### Document
- [Windcave PxPay 2.0 document](https://www.windcave.com/developer-e-commerce-hosted-pxpay).

### Example
See example in file `example/PxpaySample.php`

## HIT
The Windcave Host Initiated Transaction (HIT) solution is a web facing HTTPS service that permits control of a payment transaction on a Windcave terminal.

There is no requirement of a direct physical connection between the Point of Sale (POS) application and the Windcave terminal. All required software is on the Windcave Terminal and Host. All messages are sent online via the internet to create an end-to-end cloud-based payment solution.

### Document
- [Windcave PXHIT document](https://www.windcave.com/Document/PXHIT.pdf).
- [Quick-Start Guide - Move 5000](https://www.windcave.com/Document/Move5000_QSG_v1.1.pdf).

### Example
See example in file `example/HITSample.php`
