
            var select = new ol.interaction.Select({wrapX: false,});
            var modify = new ol.interaction.Modify({features: select.getFeatures(),});


            
            //Layer Variable//
            var basemap = new ol.layer.Tile({
              source: new ol.source.XYZ({
                attributions: 'Tiles © <a href="https://services.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer">ArcGIS</a>',
                url: 'https://services.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}'
              })
            })
            var kawasanhutan = new ol.layer.Tile({
              source: new ol.source.XYZ({
                attributions: 'Tiles © <a href="http://dbgis.menlhk.go.id/arcgis/rest/services/KLHK/Kawasan_Hutan/MapServer">ArcGIS</a>',
                url: 'http://dbgis.menlhk.go.id/arcgis/rest/services/KLHK/Kawasan_Hutan/MapServer/tile/{z}/{y}/{x}',
              }),
            });
            var projects = new ol.layer.Vector({
              source: new ol.source.Vector({
                url: '/static/data/AOI.geojson',
                format: new ol.format.GeoJSON()}),
              style: function styleFunction(feature) {
                return [
                new ol.style.Style({
                  stroke: new ol.style.Stroke({
                    color: [50, 100, 200, 1],
                    width: 3,
                    lineCap: 'round'
                  }),
                  text: new ol.style.Text({
                    font: 'bold 11px Arial',
                    overflow: true,
                    text: feature.get('LABEL'),
                    textAlign: 'center',
                    placement: 'polygon',
                    fill: new ol.style.Fill({
                    color: [0, 0, 0, 1]
                    }),
                    
                  }),
                })
                ];
              }
              });


            //Make Scale Bar and BaseMap//
            var scaleLine = new ol.control.ScaleLine({bar: true, text: true, minWidth: 300});
            




            var map = new ol.Map({
              target: 'map',
              controls: ol.control.defaults().extend([scaleLine]),
              interactions: ol.interaction.defaults().extend([select, modify]),
              layers: [basemap, kawasanhutan],
              view: new ol.View({center: ol.proj.fromLonLat([117, -1.5]), zoom: 5.8,}),
              });


            //Make Drag and Drop Tool//
            var dragAndDropInteraction;
            function setInteraction() {
              if (dragAndDropInteraction) {
                map.removeInteraction(dragAndDropInteraction);
              }
            dragAndDropInteraction = new ol.interaction.DragAndDrop({
              formatConstructors: [
                ol.format.GPX,
                ol.format.GeoJSON,
                ol.format.IGC,
                ol.format.TopoJSON ],
            });
            dragAndDropInteraction.on('addfeatures', function (event) {
              var vectorSource = new ol.source.Vector({
                features: event.features,
              });
              map.addLayer(
                new ol.layer.Vector({
                  source: vectorSource,
                })
              );
              map.getView().fit(vectorSource.getExtent());
            });
            map.addInteraction(dragAndDropInteraction);}
            setInteraction();
            



            map.addLayer(projects);
