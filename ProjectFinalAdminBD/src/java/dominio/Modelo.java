package dominio;

/**
 * @author emfam
 */
public class Modelo {
    private int idModelo;
    private String modelo;
    
    public Modelo(){}

    public Modelo(int idModelo, String modelo) {
        this.idModelo = idModelo;
        this.modelo = modelo;
    }

    public int getIdModelo() {
        return idModelo;
    }

    public void setIdModelo(int idModelo) {
        this.idModelo = idModelo;
    }

    public String getModelo() {
        return modelo;
    }

    public void setModelo(String modelo) {
        this.modelo = modelo;
    }

    @Override
    public String toString() {
        return "Modelo{" + "idModelo=" + idModelo + ", modelo=" + modelo + '}';
    }
    
}
