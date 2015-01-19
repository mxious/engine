<?php

// Include all SG files
include("Auth.php");
include("Request.php");
include("Token.php");
include("Guards/CheckVersion.php");
include("Guards/CheckTimestamp.php");
include("Guards/CheckSignature.php");
include("Guards/CheckKey.php");
include("Guards/Guard.php");
include("Exceptions/SignatureException.php");
include("Exceptions/SignatureKeyException.php");
include("Exceptions/SignatureSignatureException.php");
include("Exceptions/SignatureTimestampException.php");
include("Exceptions/SignatureVersionException.php");
