package controllers;

import models.Categoria;
import views.Views;

import java.util.ArrayList;
import java.util.List;

public class CategoriaController {
    private List<Categoria> listaCategorias;
    private Views vistaPrincipal;

    public CategoriaController(Views vistaPrincipal) {
        this.vistaPrincipal = vistaPrincipal;
        this.listaCategorias = new ArrayList<>();
    }

    public void registrarCategoria(String nombre) {
        if (nombre == null || nombre.trim().isEmpty()) {
            System.out.println("⚠️ Nombre no puede estar vacío");
            return;
        }

        Categoria nueva = new Categoria(nombre);
        listaCategorias.add(nueva);

        // Notifica a la vista principal para mostrar la nueva categoría
        vistaPrincipal.agregarCategoriaATabla(nueva.getId(), nueva.getNombre());

        System.out.println("✅ Categoría registrada: " + nombre);
    }

    public List<Categoria> getListaCategorias() {
        return listaCategorias;
    }
}
