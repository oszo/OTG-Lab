"""
A simple selenium test example written by python
"""

import unittest
from selenium import webdriver
from selenium.common.exceptions import NoSuchElementException
import time

class TestTemplate(unittest.TestCase):
    """Include test cases on a given url"""

    def setUp(self):
        """Start web driver"""
        chrome_options = webdriver.ChromeOptions()
        chrome_options.add_argument('--no-sandbox')
        chrome_options.add_argument('--headless')
        chrome_options.add_argument('--disable-gpu')
        self.driver = webdriver.Chrome(chrome_options=chrome_options)
        self.driver.implicitly_wait(10)

    def tearDown(self):
        """Stop web driver"""
        self.driver.quit()

    def test_case_1(self):
        """Find and click top-right button"""
        try:
            self.driver.get('http://otg_inpval_engin1:80/admin-login.php')
            self.driver.find_element_by_id("inputUsername").send_keys('admin')
            self.driver.find_element_by_id("inputPassword").send_keys('0YTpQxQAsXLUx9Ronn1BqwpG6YJ6Z4e')
            self.driver.find_element_by_id("loginbutton").click()

            self.driver.get('http://otg_inpval_engin1:80/index.php')

            for i in range(0,100000):
                obj = self.driver.switch_to.alert
                obj.accept()
                
        except NoSuchElementException as ex:
            self.fail(ex.msg)

if __name__ == '__main__':
    while True:
        suite = unittest.TestLoader().loadTestsFromTestCase(TestTemplate)
        unittest.TextTestRunner(verbosity=2).run(suite)
        time.sleep(5)
