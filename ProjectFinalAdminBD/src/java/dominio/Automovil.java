package dominio;

/**
 * @author emfam
 */
public class Automovil {

    private int idAutomovil;
    private String marca;
    private int idModelo;
    private String estilo;
    private int idColor;
    private int capacidadPasajeros;
    private int combustible;
    private boolean transmision;
    private int anio;
    private int stock;
    private double precio;
    private String detalles;
    
    public Automovil(){}

    public Automovil(int idAutomovil, String marca, int idModelo, String estilo, int idColor, int capacidadPasajeros, int combustible, boolean transmision, int anio, int stock, double precio, String detalles) {
        this.idAutomovil = idAutomovil;
        this.marca = marca;
        this.idModelo = idModelo;
        this.estilo = estilo;
        this.idColor = idColor;
        this.capacidadPasajeros = capacidadPasajeros;
        this.combustible = combustible;
        this.transmision = transmision;
        this.anio = anio;
        this.stock = stock;
        this.precio = precio;
        this.detalles = detalles;
    }

    public int getIdAutomovil() {
        return idAutomovil;
    }

    public void setIdAutomovil(int idAutomovil) {
        this.idAutomovil = idAutomovil;
    }

    public String getMarca() {
        return marca;
    }

    public void setMarca(String marca) {
        this.marca = marca;
    }

    public int getIdModelo() {
        return idModelo;
    }

    public void setIdModelo(int idModelo) {
        this.idModelo = idModelo;
    }

    public String getEstilo() {
        return estilo;
    }

    public void setEstilo(String estilo) {
        this.estilo = estilo;
    }

    public int getIdColor() {
        return idColor;
    }

    public void setIdColor(int idColor) {
        this.idColor = idColor;
    }

    public int getCapacidadPasajeros() {
        return capacidadPasajeros;
    }

    public void setCapacidadPasajeros(int capacidadPasajeros) {
        this.capacidadPasajeros = capacidadPasajeros;
    }

    public int getCombustible() {
        return combustible;
    }

    public void setCombustible(int combustible) {
        this.combustible = combustible;
    }

    public boolean isTransmision() {
        return transmision;
    }

    public void setTransmision(boolean transmision) {
        this.transmision = transmision;
    }

    public int getAnio() {
        return anio;
    }

    public void setAnio(int anio) {
        this.anio = anio;
    }

    public int getStock() {
        return stock;
    }

    public void setStock(int stock) {
        this.stock = stock;
    }

    public double getPrecio() {
        return precio;
    }

    public void setPrecio(double precio) {
        this.precio = precio;
    }

    public String getDetalles() {
        return detalles;
    }

    public void setDetalles(String detalles) {
        this.detalles = detalles;
    }

    @Override
    public String toString() {
        return "Automovil{" + "idAutomovil=" + idAutomovil + ", marca=" + marca + ", idModelo=" + idModelo + ", estilo=" + estilo + ", idColor=" + idColor + ", capacidadPasajeros=" + capacidadPasajeros + ", combustible=" + combustible + ", transmision=" + transmision + ", anio=" + anio + ", stock=" + stock + ", precio=" + precio + ", detalles=" + detalles + '}';
    }
          
}
