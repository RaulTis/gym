
//VALIDACION DE LOGIN
$(document).ready(function(){
	$('#login').bootstrapValidator({
		live:'enabled', submitButtons:'button[id="entrar"]', message:'Este no es un valor v&aacute;lido',
		feedbackIcons:{
				valid: 'fa fa-check',
				invalid: 'fa fa-close',
				validating: 'fa fa-refresh'
		}, fields:{
				noTarjeta: {
					validators:{
							notEmpty:{
									message: 'Numero de Tarjeta Obligatorio'
									 },
							 stringLength: {
								     min: 2, max: 8, message: 'El numero de tarjeta al menos debe tener 2 Numeros'
							               },
							 regexp:{
									regexp:/[0-9]+$/,
									message: 'El Numero de tarjeta solo debe contener numeros'	
									 }
							    }
						},
						
				contrasena: {
					validators:{
							notEmpty:{
									message: 'Contraseña Obligatoria'
									 },
							 stringLength: {
								     min: 4, max: 8, message: 'La Contraseña debe tener al menos 4 y m&aacute;ximo 8 car&aacute;cteres de Longitud'
							               },
							 regexp:{
									regexp:/[a-zA-Z0-9]+$/,
									message: 'La Contraseña debe tener Minimo 4 y maximo 8 Caracteres, sin espacios en Blanco'	
									 }
							    }
						},
						
			    	}
		});
});


//VALIDACION DE PERSONAL/////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function(){
	$('#nuevoTutor').bootstrapValidator({
		live:'enabled', submitButtons:'button[id="alta"]', message:'Este no es un valor v&aacute;lido',
		feedbackIcons:{
				valid: 'fa fa-check',
				invalid: 'fa fa-close',
				validating: 'fa fa-refresh'
		}, fields:{
	noTarjeta: {
					validators:{
							notEmpty:{
									message: 'Numero de Tarjeta Obligatorio'
									 },
							 stringLength: {
								     min: 2, max: 8, message: 'El numero de tarjeta al menos debe tener 2 Numeros'
							               },
							 regexp:{
									regexp:/[0-9]+$/,
									message: 'El Numero de tarjeta solo debe contener numeros'	
									 }
							    }
						},
						
	rfc: {
					validators:{
							notEmpty:{
									message: 'RFC Obligatorio'
									 },
							 stringLength: {
								     min: 13, max: 13, message: 'el RFC debe tener 13 caracteres'
							               },
							 regexp:{
									regexp:/^([A-Z,Ñ,&]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[A-Z|\d]{3})$/,
									message: 'RFC Incorrecto, solo debe contener letas MAYUSCULAS'	
									 }
							    }
						},
	titulo: {
					validators:{
							notEmpty:{
									message: 'Titulo Obligatorio'
									 },
							 stringLength: {
								     min: 5, max: 20, message: 'El titulo debe de tener al menos 5 Caracteres'
							               },
							 regexp:{
									regexp:/[a-zA-Z0-9]+$/,
									message: 'El Titulo solo debe contener letras'	
									 }
							    }
						},
	 nombre: {
					validators:{
							notEmpty:{
									message: 'Nombre del Tutor Obligatorio'
									 },
							 stringLength: {
								     min: 10, message: 'Nombre demasido corto'
							               },
							 regexp:{
									regexp:/[a-zA-Z]+$/,
									message: 'Nombre Incorrecto'	
									 }
							    }
						},
	areaPersonal: {
					validators:{
							notEmpty:{
									message: 'Seleccione un Area'
									 },
							 stringLength: {
								     min: 1, max:20, message: 'Seleccione un Area'
							               },
							
							    }
						},
	activo: {
					validators:{
							notEmpty:{
									message: 'Seleccione un Estado'
									 },
							 stringLength: {
								     min: 1, max:10, message: 'Seleccione un Area'
							               },
							 regexp:{
									regexp:/[a-zA-Z0-9]+$/,
									message: '3'	
									 }
							    }
						},
	telefono: {
					validators:{
							notEmpty:{
									message: 'Telefono Obligatorio'
									 },
							 stringLength: {
								     min: 10, max:10, message: 'Numero de Telefono invalido'
							               },
							 regexp:{
									regexp:/[0-9]+$/,
									message: 'Numero de Telefono Invalido'	
									 }
							    }
						},
	contrasena: {
					validators:{
							notEmpty:{
									message: 'Contraseña Obligatoria'
									 },
							 stringLength: {
								     min: 4, max: 8, message: 'La Contraseña debe tener al menos 4 y m&aacute;ximo 8 car&aacute;cteres de Longitud'
							               },
							 regexp:{
									regexp:/[a-zA-Z0-9]+$/,
									message: 'La Contraseña debe tener Minimo 4 y maximo 8 Caracteres, sin espacios en Blanco'	
									 }
							    }
						},
						
			    	}
		});
});


//VALIDACION De GRUPO//////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function(){
	$('#asignar1').bootstrapValidator({
		live:'enabled', submitButtons:'button[id="enviar"]', message:'Este no es un valor v&aacute;lido',
		feedbackIcons:{
				valid: 'fa fa-check',
				invalid: 'fa fa-close',
				validating: 'fa fa-refresh'
		}, fields:{
	AsignaTutorAlumnos: {
					validators:{
							notEmpty:{
									message: 'Numero de Asignacion Obligatoria'
									 },
							 stringLength: {
								     min: 1, max: 8, message: 'El Numero de Control debe tener entre 1 y 8 Numeros'
							               },
							 regexp:{
									regexp:/[0-9]+$/,
									message: 'Solo Debe Contener Numeros'	
									 }
							    }
						},
						
	NombreGrupo: {
					validators:{
							notEmpty:{
									message: 'Nombre del Grupo Obligatorio'
									 },
							 stringLength: {
								     min: 5, max: 20, message: 'Debe Contener entre 5 y 20 Caracteres'
							               },
							 regexp:{
									regexp:/[a-zA-Z0-9]+$/,
									message: 'No se pueden usar Caracteres Especiales'	
									 }
							    }
						},
	ClaveTutor: {
					validators:{
							notEmpty:{
									message: 'Seleccione un Tutor'
									 },
							 stringLength: {
								     min: 1, max:3, message: 'Seleccione un Tutor'
							               },
							 
							    }
						},
	FechaAsignacion: {
					validators:{
							notEmpty:{
									message: 'Seleccione una Fecha'
									 },
							 
							    }
						},
		OficioNombramiento: {
					validators:{
							notEmpty:{
									message: 'Oficio de Nombramiento Obligatorio'
									 },
							 stringLength: {
								     min: 1, max:5, message: 'Debe Contener entre 1 y 20 Caracteres'
							               },
					regexp:{
									regexp:/[0-9]+$/,
									message: 'Solo se Permiten Numeros'	
									 }
							    }
						},
		HoraFechaTutoria: {
					validators:{
							notEmpty:{
									message: 'Hora y Fecha Obligatoria'
									 },
									 stringLength: {
								     min: 10, max:30, message: 'Debe Contener entre 10 y 30 Caracteres'
							               },
						
					
							    }
						},
		PeriodoGrupo: {
					validators:{
							notEmpty:{
									message: 'Seleccione una  Opcion Correcta'
									 },
							 stringLength: {
								     min: 3, max:20, message: 'Seleccione una Opcion Correcta'
							               },
					
							    }
						},
						
						
						
			    	}
		});
});
//VALIDACION De ASIGNAR GRUPO//////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function(){
	$('#asignar2').bootstrapValidator({
		live:'enabled', submitButtons:'button[id="mostrarGrupo"]', message:'Este no es un valor v&aacute;lido',
		feedbackIcons:{
				valid: 'fa fa-check',
				invalid: 'fa fa-close',
				validating: 'fa fa-refresh'
		}, fields:{
	ClaveAsignaTutor: {
					validators:{
							notEmpty:{
									message: 'Seleccione un Grupo'
									 },
							 
							    }
						},
						
	ClaveAlumno: {
					validators:{
							
							 stringLength: {
								     min: 8, max:8 , message: 'Debe Contener 8 Caracteres'
							               },
							 regexp:{
									regexp:/[0-9]+$/,
									message: 'Solo debe Contener Numeros'	
									 }
							    }
						},			
		}    	
		});
});
//VALIDACION De ASISTENCIA ACTIVIDAD//////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function(){
	$('#actividad2').bootstrapValidator({
		live:'enabled', submitButtons:'button[id="mostrarAsistencia"]', message:'Este no es un valor v&aacute;lido',
		feedbackIcons:{
				valid: 'fa fa-check',
				invalid: 'fa fa-close',
				validating: 'fa fa-refresh'
		}, fields:{
	ClaveActividad: {
					validators:{
							notEmpty:{
									message: 'Seleccione un Actividad'
									 },
							 
							    }
						},
						
	ControlAlumno: {
					validators:{
							
							 stringLength: {
								     min: 8, max:8 , message: 'Debe Contener 8 Caracteres'
							               },
							 regexp:{
									regexp:/[0-9]+$/,
									message: 'Solo debe Contener Numeros'	
									 }
							    }
						},			
		}    	
		});
});

//VALIDACION De LIBERAR ALUMNOS//////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function(){
	$('#liberar2').bootstrapValidator({
		live:'enabled', submitButtons:'button[id="mostrarLiberacion"]', message:'Este no es un valor v&aacute;lido',
		feedbackIcons:{
				valid: 'fa fa-check',
				invalid: 'fa fa-close',
				validating: 'fa fa-refresh'
		}, fields:{
	ClaveLibera: {
					validators:{
							notEmpty:{
									message: 'Seleccione una Clave de Liberacion'
									 },
							 
							    }
						},
						
	ControlAlumno: {
					validators:{
							
							 stringLength: {
								     min: 8, max:8 , message: 'Debe Contener 8 Caracteres'
							               },
							 regexp:{
									regexp:/[0-9]+$/,
									message: 'Solo debe Contener Numeros'	
									 }
							    }
						},			
		}    	
		});
});

$(document).ready(function(){
	$('#liberar2').bootstrapValidator({
		live:'enabled', submitButtons:'button[id="alta"]', message:'Este no es un valor v&aacute;lido',
		feedbackIcons:{
				valid: 'fa fa-check',
				invalid: 'fa fa-close',
				validating: 'fa fa-refresh'
		}, fields:{
	ClaveLibera: {
					validators:{
							notEmpty:{
									message: 'Seleccione una Clave de Liberacion'
									 },
							 
							    }
						},
						
	ControlAlumno: {
					validators:{
						notEmpty:{
									message: 'Numero de Control Obligatorio'
									 },
							
							 stringLength: {
								     min: 8, max:8 , message: 'Debe Contener 8 Caracteres'
							               },
							 regexp:{
									regexp:/[0-9]+$/,
									message: 'Solo debe Contener Numeros'	
									 }
							    }
						},			
		}    	
		});
});



//////////////////////////////////VALIDAR ALUMNOS
$(document).ready(function(){
	$('#nuevoAlumno').bootstrapValidator({
		live:'enabled', submitButtons:'button[id="alta"]', message:'Este no es un valor v&aacute;lido',
		feedbackIcons:{
				valid: 'fa fa-check',
				invalid: 'fa fa-close',
				validating: 'fa fa-refresh'
		}, fields:{
	noControl: {
					validators:{
							notEmpty:{
									message: 'Numero de Control Obligatorio'
									 },
							 stringLength: {
								     min: 1, max: 8, message: 'El Numero de Control debe tener entre 1 y 8 Numeros'
							               },
							 regexp:{
									regexp:/[0-9]+$/,
									message: 'Solo Debe Contener Numeros'	
									 }
							    }
						},
						
	nombre: {
					validators:{
							notEmpty:{
									message: 'Nombre del Alumno Obligatorio'
									 },
							 stringLength: {
								     min: 10, max: 50, message: 'Minimo, 10 Caracteres'
							               },
							 regexp:{
									regexp:/[a-zA-Z0-9]+$/,
									message: 'No se pueden usar Caracteres Especiales y Numeros'	
									 }
							    }
						},
	Carrera: {
					validators:{
							notEmpty:{
									message: 'Seleccione una Carrera'
									 },
							 stringLength: {
								     min: 1, max:1, message: 'Seleccione una Carrera'
							               },
							 
							    }
						},
	Semestre: {
					validators:{
							notEmpty:{
									message: 'Seleccione un Semestre'
									 },
							 
							    }
						},
		Sexo: {
					validators:{
							notEmpty:{
									message: 'Seleccione un Sexo'
									 },
							
							    }
						},
		HoraFechaTutoria: {
					validators:{
							notEmpty:{
									message: 'Hora y Fecha Obligatoria'
									 },
									 stringLength: {
								     min: 10, max:30, message: 'Debe Contener entre 10 y 30 Caracteres'
							               },
						
					
							    }
						},
		fechaNacimiento: {
					validators:{
							notEmpty:{
									message: 'Seleccione una  Fecha'
									 },
							 stringLength: {
								     min: 10, max:10, message: 'Seleccione una Opcion Correcta'
							               },
					
							    }
						},
						
						periodoIngreso: {
					validators:{
							notEmpty:{
									message: 'Seleccione un periodo de Ingreso'
									 },
							
					
							    }
						},
						
						
						
			    	}
		});
});

//////////////////////////////////VALIDAR Actividades
$(document).ready(function(){
	$('#actividad').bootstrapValidator({
		live:'enabled', submitButtons:'button[id="enviar"]', message:'Este no es un valor v&aacute;lido',
		feedbackIcons:{
				valid: 'fa fa-check',
				invalid: 'fa fa-close',
				validating: 'fa fa-refresh'
		}, fields:{
	ClaveActividad: {
					validators:{
							notEmpty:{
									message: 'Clave de Actividad Obligatorio'
									 },
							 stringLength: {
								     min: 1, max: 8, message: 'El Numero de Actividad debe tener entre 1 y 5 Numeros'
							               },
							 regexp:{
									regexp:/[0-9]+$/,
									message: 'Solo Debe Contener Numeros'	
									 }
							    }
						},
						
	FechaActividad: {
					validators:{
							notEmpty:{
									message: 'Seleccione una Fecha'
									 },
					
							    }
						},
	NombreActividad: {
					validators:{
							notEmpty:{
									message: 'Debe Escribir el Nombre de la Actividad'
									 },
							 stringLength: {
								     min: 10, max:50, message: 'Minimo 10 Caracteres'
							               },
							 
							    }
						},
	HorasActividad: {
					validators:{
							notEmpty:{
									message: 'Seleccione las Hora de Actividad'
									 },
							 
							    }
						},
		SemestreActividad: {
					validators:{
							notEmpty:{
									message: 'Seleccione el Periodo'
									 },
							
							    }
						
		
						},
						
						
						
			    	}
		});
});

//////////////////////////////////VALIDAR Liberacion
$(document).ready(function(){
	$('#liberacion').bootstrapValidator({
		live:'enabled', submitButtons:'button[id="alta"]', message:'Este no es un valor v&aacute;lido',
		feedbackIcons:{
				valid: 'fa fa-check',
				invalid: 'fa fa-close',
				validating: 'fa fa-refresh'
		}, fields:{
	ClaveLibera: {
					validators:{
							notEmpty:{
									message: 'Clave de Liberacion Obligatoria'
									 },
							 stringLength: {
								     min: 1, max: 8, message: 'El Numero de Actividad debe tener entre 1 y 5 Numeros'
							               },
							 regexp:{
									regexp:/[0-9]+$/,
									message: 'Solo Debe Contener Numeros'	
									 }
							    }
						},
						
	FechaLiberacion: {
					validators:{
							notEmpty:{
									message: 'Seleccione una Fecha'
									 },
					
							    }
						},
	ObservacionesLibera: {
					validators:{
							notEmpty:{
									message: 'Debe Escribir Observaciones'
									 },
							 stringLength: {
								     min: 10, max:50, message: 'Minimo 10 Caracteres, maximo 50'
							               },
							 
							    }
						},
	
									
						
			    	}
		});
});


