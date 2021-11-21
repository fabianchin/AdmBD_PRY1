<%@page contentType="text/html"%>
<%@page pageEncoding="UTF-8"%>

<%@ taglib uri="http://struts.apache.org/tags-bean" prefix="bean" %>
<%@ taglib uri="http://struts.apache.org/tags-html" prefix="html" %>
<%@ taglib uri="http://struts.apache.org/tags-logic" prefix="logic" %>

<html:html lang="true">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><bean:message key="welcome.title"/></title>
        <html:base/>
    </head>
    <body style="background-color: white">

        <logic:notPresent name="org.apache.struts.action.MESSAGE" scope="application">
            <div  style="color: red">
                ERROR:  Application resources not loaded -- check servlet container
                logs for error messages.
            </div>
        </logic:notPresent>

        <h3><bean:message key="welcome.heading"/></h3>
        <p><bean:message key="welcome.message"/></p>

    </body>
    <html:form action="/login">
        <table border="1" class="data_form">
            <tr>
                <td>Usuario</td><td><html:text property="usuario" styleClass="data_form"></html:text></td>
            </tr>
            <html:errors property="usuario"/><br/>
            <tr>
                <td>Clave</td><td><html:password property="password" styleClass="data_form"></html:password></td>
            </tr>
            <html:errors property="password"/><br/>


        </table>
            <html:submit value="Confirmar" styleClass="boton"></html:submit>
    </html:form>
</html:html>
