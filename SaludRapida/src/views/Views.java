package views;

import controllers.CategoriaController;

import javax.swing.*;
import javax.swing.table.DefaultTableModel;
import java.awt.*;
import java.awt.event.*;

public class Views extends JFrame {
    private JTextField txtBuscar;
    private JButton btnNuevaCategoria;
    private JTable tablaCategorias;
    private DefaultTableModel modeloTabla;
    private CategoriaController controller;

    public Views() {
        controller = new CategoriaController(this);

        setTitle("Gestión de Categorías");
        setSize(600, 400);
        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setLayout(new BorderLayout());

        JPanel panelSuperior = new JPanel(new FlowLayout());
        txtBuscar = new JTextField(20);
        btnNuevaCategoria = new JButton("Nueva Categoría");

        panelSuperior.add(new JLabel("Buscar:"));
        panelSuperior.add(txtBuscar);
        panelSuperior.add(btnNuevaCategoria);
        add(panelSuperior, BorderLayout.NORTH);

        String[] columnas = {"ID", "Nombre"};
        modeloTabla = new DefaultTableModel(columnas, 0);
        tablaCategorias = new JTable(modeloTabla);
        JScrollPane scrollPane = new JScrollPane(tablaCategorias);
        add(scrollPane, BorderLayout.CENTER);

        btnNuevaCategoria.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                new CategoriaView(controller); // Vista secundaria
            }
        });

        setVisible(true);
    }

    public void agregarCategoriaATabla(int id, String nombre) {
        modeloTabla.addRow(new Object[]{id, nombre});
    }
}