# -*- coding: utf-8 -*-
import urllib2, unicodedata, codecs
from bs4 import BeautifulSoup

def readSoup(url):
    url = "http://" + url
    request = urllib2.Request(url)
    response = urllib2.urlopen(request)
    soup = BeautifulSoup(response, 'html.parser')
    return soup

def getCity(url):
    global city_name
    soup = readSoup(url)

    citys = soup.find('ul', attrs = {'class', 'guideList4'})
    for city in citys.find_all('li'):
        city_text = unicode(city)
        if city_text.find('<a href=') > 0:
            city_name = (city.a).string
        else:
            index = city_text.find('/>') + 2
            city_name = city_text[index:]
            city_name = city_name[:-8]
        f.write(city_name+'\n')

if __name__ == '__main__':
    savefile = "city.txt"
    url = "j-sen.jp/guide_area47.htm"
    f = codecs.open(savefile, 'w', 'utf-8')

    print "Begin crawl web " + url

    getCity(url)
    #tmp = city_name
    #f.write(tmp+'\n')

    print "Crawled Completed!"
    f.close
