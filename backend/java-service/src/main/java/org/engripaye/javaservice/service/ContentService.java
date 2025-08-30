package org.engripaye.javaservice.service;

import org.engripaye.javaservice.entity.Content;
import org.engripaye.javaservice.repository.ContentRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class ContentService {

    @Autowired
    private ContentRepository contentRepository;

    public void saveContent(Content content){
        contentRepository.save(content);
    }
}
