# -*- coding: utf-8 -*-
import urllib2, unicodedata, codecs
import timeit
from bs4 import BeautifulSoup

def readSoup(url):
    if url.find('http://') < 0:
        url = "http://" + url
    request = urllib2.Request(url)
    response = urllib2.urlopen(request)
    soup = BeautifulSoup(response, 'html.parser')
    return soup

def getWork(system_work_url):
    global work_counter
    #############################
    step = 0
    #############################
    soup = readSoup(system_work_url)
    workBoxs = soup.find_all('div', attrs = {'class', 'searchResultBox'})
    for workBox in workBoxs:
        #work_id = int(str(((workBox.h2).a)['href'])[1:][:-2])
        work_id = str(((workBox.h2).a)['href'])[1:][:-2]
        ######################################
        tmp=u"INSERT INTO `jsen`.`system_work` (`system_work_name`, `work_id`) VALUES"
        tmp=tmp+u"('"+system_work_name+u"','"+work_id+u"');"
        f.write(tmp+'\n')
        ######################################
        step += 1
        work_counter += 1
        print "Number of work = "+str(step)
        #stop = timeit.default_timer()
    print "=============================================>Work Counter = "+str(work_counter)
    #loop jump next page
    if(soup.find('li', attrs = {'class', 'next'}) != None):
        jump = soup.find('li', attrs = {'class', 'next'})
        system_work_url = "j-sen.jp"+str((jump.a)['href'])
        print "Jump to next page.............."
        getWork(system_work_url)


def getWorkFromGuide(guide_job_url):
    global system_work_name
    step = 0
    ############################
    soup = readSoup(guide_job_url)
    system_works = soup.find('div', attrs = {'class', 'blueBox'})
    for system_work in system_works.find_all('p'):
        system_work_name = str((system_work.input)['value'])
        system_work_url = "http://j-sen.jp//"+str((system_work.a)['href'])
        step += 1
        print "-------------------"
        print "System_Work = "+str(step)
        print "-------------------"
        #stop = timeit.default_timer()
        getWork(system_work_url)

def getGuideFromPrefectture(guide_url):
    step = 0
    soup = readSoup(guide_url)
    guide_lists = soup.find('div', attrs = {'class', 'inner'})
    for guide_list in guide_lists.find_all('ul', attrs = {'class', 'guideList1'}):
        for guide_job in guide_list.find_all('a'):
            guide_job_url = "http://j-sen.jp/"+str(guide_job['href'])
            step += 1
            print "**********************"
            print "Prefecture = "+str(step)
            print "**********************"
            #stop = timeit.default_timer()
            getWorkFromGuide(guide_job_url)

if __name__ == '__main__':
    work_counter = 0
    ############################
    system_savefile = "data_system_work.sql"
    ############################
    guide_url = "j-sen.jp/guide_job.htm"
    ############################
    f = codecs.open(system_savefile, 'w', 'utf-8')
    ############################
    #start = timeit.default_timer()
    ##############################
    print "Insert table System_Work..."
    print "Begin crawl web : "+guide_url
    getGuideFromPrefectture(guide_url)
    print "Crawled Completed!"
    print "Result data stored in the file has name : "+system_savefile
    f.close
