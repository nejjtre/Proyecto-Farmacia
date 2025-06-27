package models;

public class Categoria {
    private static int contador = 1;
    private int id;
    private String nombre;

    public Categoria(String nombre) {
        this.id = contador++;
        this.nombre = nombre;
    }

    public int getId() {
        return id;
    }

    public String getNombre() {
        return nombre;
    }
}
