# WXR Validator

This script will run checks on any WXR (WordPress eXtended RSS) file to ensure the syntax is valid before a WordPress import is run.

# Running this script
To run the checks, run the following commands:
  ```
    git clone https://github.com/kkoppenhaver/wxr-validator
    cd wxr-validator
    php wxr-validator.php /path/to/fileToTest.xml
  ```

If all the tests pass, you should see a message to that effect.  If some of the tests fail, there will be output letting you know which tests failed.

#Completed Checks
  - Check for XML tag at top of file

#TO-DO
  - Check for unopened/unclosed tags
