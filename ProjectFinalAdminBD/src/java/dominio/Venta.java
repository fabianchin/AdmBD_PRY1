package dominio;

/**
 * @author emfam
 */
public class Venta {
    private int idAutomovil;
    private int cedula;
    private String usuario;
    private double precioVenta;
    
    public Venta(){}

    public Venta(int idAutomovil, int cedula, String usuario, double precioVenta) {
        this.idAutomovil = idAutomovil;
        this.cedula = cedula;
        this.usuario = usuario;
        this.precioVenta = precioVenta;
    }

    public int getIdAutomovil() {
        return idAutomovil;
    }

    public void setIdAutomovil(int idAutomovil) {
        this.idAutomovil = idAutomovil;
    }

    public int getCedula() {
        return cedula;
    }

    public void setCedula(int cedula) {
        this.cedula = cedula;
    }

    public String getUsuario() {
        return usuario;
    }

    public void setUsuario(String usuario) {
        this.usuario = usuario;
    }

    public double getPrecioVenta() {
        return precioVenta;
    }

    public void setPrecioVenta(double precioVenta) {
        this.precioVenta = precioVenta;
    }

    @Override
    public String toString() {
        return "Venta{" + "idAutomovil=" + idAutomovil + ", cedula=" + cedula + ", usuario=" + usuario + ", precioVenta=" + precioVenta + '}';
    }
    
}
