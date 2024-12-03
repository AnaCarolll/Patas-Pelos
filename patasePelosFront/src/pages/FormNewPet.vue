<template>
  <q-page padding id="fundoDaPagina" class="flex flex-center">
    <q-form class="q-pa-md flex flex-center">
      <div class="text-center">
        <h4  id="my-fonty">Cadastro de novo Pet</h4>
      </div>

      <div class="q-pa-md flex flex-column items-center col-12 col-md-6" id="fundoFormulario">

        <q-input model-value="" label="Nome" outlined class="q-mb-md full-width" />
        <q-input mask="##/##/####" model-value="" label="Data de Nascimento" outlined class="q-mb-md full-width">
          <template v-slot:append>
            <q-icon name="event" class="cursor-pointer">
              <q-popup-proxy>
                <q-date model-value="bornDate" mask="DD/MM/yyyy" />
              </q-popup-proxy>
            </q-icon>
          </template>
        </q-input>
        <q-select model-value="" label="Espécie" outlined class="q-mb-md full-width"
                  :options="[
                    'Cachorro',
                     'Gato',
                     'Outro'
                     ]"
        />
          <q-btn label="Cadastrar" id="buttonCadastrar"/>

      </div>

    </q-form>
   <div class="imgPatinhas">
     <img src="../../img/imagemPatinhas.png">
   </div>
  </q-page>
</template>



<script lang="ts">
import { defineComponent } from 'vue';
export default defineComponent({
})
</script>
<style>
.imgPatinhas{


}
#buttonCadastrar{
  background-color: #ffffff;
  display: flex;
  justify-content: center;
  margin:0 auto;
}
#my-fonty {
  text-align: center;
}
.text-center {
  font-family: "Itim", serif;
  font-weight: 400;
  font-style: normal;

}
#fundoFormulario {
  background-color: rgba(255, 255, 255, 0.4); /* Cor branca com 80% de opacidade */
  border-radius: 30px
;
}
#fundoDaPagina{
  background-color:#6781E6;
}
</style>
