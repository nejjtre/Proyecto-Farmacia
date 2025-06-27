package views;

import controllers.CategoriaController;

import javax.swing.*;
import java.awt.event.*;

public class CategoriaView extends JFrame {
    private JTextField txtNombre;
    private JButton btnGuardar;
    private CategoriaController controller;

    public CategoriaView(CategoriaController controller) {
        this.controller = controller;

        setTitle("Registrar Categoría");
        setLayout(null);
        setSize(300, 200);

        JLabel lblNombre = new JLabel("Nombre:");
        lblNombre.setBounds(30, 30, 100, 30);
        add(lblNombre);

        txtNombre = new JTextField();
        txtNombre.setBounds(100, 30, 150, 30);
        add(txtNombre);

        btnGuardar = new JButton("Guardar");
        btnGuardar.setBounds(100, 80, 100, 30);
        add(btnGuardar);

        btnGuardar.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                String nombre = txtNombre.getText();
                controller.registrarCategoria(nombre);
                dispose(); // cerrar ventana después de guardar
            }
        });

        setDefaultCloseOperation(DISPOSE_ON_CLOSE);
        setVisible(true);
    }
}