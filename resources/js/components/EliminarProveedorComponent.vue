<template>
        <input 
        class="btn btn-danger" 
        type="submit" 
        value="Eliminar"
        @click="eliminarProveedor"
        >
</template>
<script>
export default {
        props: ['proveedorId'],
        mounted(){
        },
        methods:{
                eliminarProveedor: function(){
                        //Con esto vemos a quien le dieron clic
                        //console.log('el id del cliente que quieres eliminar es ', this.clienteId)

                        /**Agregamos sweet alert */
                        this.$swal({
                                title: '¿Estas seguro que deseas eliminar este proveedor?',
                                text: "Una vez eliminado, no puedes recuperar su información",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Si, eliminalo',
                                cancelButtonText: 'No lo elimines',
                                }).then((result) => {
                                        if (result.isConfirmed) {
                                                //parametros de axios delete
                                                const params = {
                                                        id: this.proveedorId
                                                }
                                                //Agregamos la instrucción de delete por medio de AXIOS
                                                axios.post(`/proveedores/${this.proveedorId}`,{params, _method: 'delete'})
                                                //axios funciona con promises
                                                .then(respuesta => {
                                                        //esta es nuestra conformación
                                                        this.$swal({
                                                                title: 'Eliminar Proveedor',
                                                                text: 'El Proveedor ha sido eliminado',
                                                                icon: 'success',
                                                })
                                                //nos falta actualizar el DOM por que se elimina pero no desaparece hasta que se actualiza.
                                                /**Nos damoscuenta que esta en una tabla, entonces tenemos que eliminarlo del padre del elemento
                                                de nuestro html, tenemos tres niveles, para poderlo eleiminar de la tabla. */
                                                this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);        
                                                })
                                                .catch(error=>{
                                                        console.log(error)
                                                })
                                                
                                        }
                        })
                }
        }
}
</script>
