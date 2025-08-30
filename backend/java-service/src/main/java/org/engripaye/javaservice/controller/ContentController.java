package org.engripaye.javaservice.controller;

import org.engripaye.javaservice.entity.Content;
import org.engripaye.javaservice.service.ContentService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
@RequestMapping("/api/content")
public class ContentController {

    @Autowired
    private ContentService contentService;

    @PostMapping("/save")
    public ResponseEntity<String> saveContent(@RequestBody Content content){
        contentService.saveContent(content);
        return ResponseEntity.ok("content saved successfully!");
    }
}
