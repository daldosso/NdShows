package com.adaldosso.ndshows;

import java.util.ArrayList;
import java.util.List;

public class TvShow {

    private String name;
    private CharSequence studio;
    private CharSequence title;
    private List<String> images = new ArrayList<>();

    public TvShow(String name) {
        this.name = name;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public CharSequence getStudio() {
        return studio;
    }

    public CharSequence getTitle() {
        return title;
    }

    public void addImage(String imageUrl) {
        images.add(imageUrl);
    }

    public List<String> getImages() {
        return images;
    }
}
