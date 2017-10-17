# !usr/bin/python
# -*- coding:utf-8 -*-
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.action_chains import ActionChains  # 引入ActionChains鼠标操作类
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By
import time

browser = webdriver.Firefox()
# while (count < num):
browser.get("http://www.note.com")
    # browser.find_element_by_name();
    # browser.maximize_window()  # maximize the explorer window
    # tableName = browser.find_element_by_id('generator-tablename')  # Find input box where to generate table Name
    # tableName.send_keys(tableNames[count])  # fill in table Name
    #
    # className = browser.find_element_by_id("generator-modelclass")
    # className.send_keys(classNames[count])
    # className.send_keys();
    # label = browser.find_element_by_id(
    #     'generator-usetableprefix')  # find checkbox to click ,so a lable of a table'S columns can be created
    # label.click();
    #
    # submitBtn = browser.find_element_by_name(
    #     "preview")  # find the preview button,by click it , a generator button was created
    # submitBtn.click()
    # time.sleep(15);
    # generatorBtn = browser.find_element_by_name("generate")
    #
    # generatorBtn.click()
    # time.sleep(15)
    #
    # count = count + 1
    # print(tableNames[count])
# end while browser.quit();
